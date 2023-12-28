# pip install mediapipe
import cv2
import mediapipe as mp
import numpy as np
import time
import datetime

mp_drawing = mp.solutions.drawing_utils
mp_pose = mp.solutions.pose
counter_right = 0
counter_left = 0
stage_left = None
stage_right = None
seconds = 1200
player_count = 0

def calculate_angle(a,b,c):
    a = np.array(a) # First
    b = np.array(b) # Mid
    c = np.array(c) # End
    
    radians = np.arctan2(c[1]-b[1], c[0]-b[0]) - np.arctan2(a[1]-b[1], a[0]-b[0])
    angle = np.abs(radians*180.0/np.pi)
    
    if angle >180.0:
        angle = 360-angle
        
    return angle 

class VideoCamera(object):
    def __init__(self):
        self.cap = cv2.VideoCapture(0)
    
    def __del__(self):
        self.cap.releast()
    
    def get_frame(self):
        
        with mp_pose.Pose(min_detection_confidence=0.5, min_tracking_confidence=0.5) as pose:
            while self.cap.isOpened():
                ret , frame = self.cap.read()
                
                # Recolor image to RGB
                image = cv2.cvtColor(frame, cv2.COLOR_BGR2RGB)
                image.flags.writeable = False
                
                # Make detection
                results = pose.process(image)

                # Recolor back to BGR
                image.flags.writeable = True
                image = cv2.cvtColor(image, cv2.COLOR_RGB2BGR)
                
                timer = datetime.timedelta(seconds = seconds)
                seconds -= 1
                
                # Extract landmarks
                try:
                    landmarks = results.pose_landmarks.landmark
                    
                    # Get coordinates
                    shoulder = [landmarks[mp_pose.PoseLandmark.LEFT_SHOULDER.value].x,landmarks[mp_pose.PoseLandmark.LEFT_SHOULDER.value].y]
                    elbow = [landmarks[mp_pose.PoseLandmark.LEFT_ELBOW.value].x,landmarks[mp_pose.PoseLandmark.LEFT_ELBOW.value].y]
                    wrist = [landmarks[mp_pose.PoseLandmark.LEFT_WRIST.value].x,landmarks[mp_pose.PoseLandmark.LEFT_WRIST.value].y]
                    
                    # Calculate angle
                    angle_left = calculate_angle(shoulder, elbow, wrist)
                    
                    # Visualize angle
                    cv2.putText(image, str(angle_left), 
                                    tuple(np.multiply(elbow, [640, 480]).astype(int)), 
                                    cv2.FONT_HERSHEY_SIMPLEX, 0.5, (255, 255, 255), 2, cv2.LINE_AA
                                        )
                    
                    # Curl counter logic
                    if angle_left > 150:
                        stage_left = "up"
                    if angle_left < 80 and stage_left =='up':
                        stage_left="down"
                        counter_left += 1
                        player_count += 1
                                
                except:
                    pass
                
                # Render curl counter
                # Setup status box
                if(seconds > 0):
                    cv2.putText(image, str(timer), (15,30), 
                            cv2.FONT_HERSHEY_SIMPLEX, 1, (0,0,255), 2, cv2.LINE_AA)
                
                # Rep data
                cv2.putText(image, 'REPS', (15,55), 
                            cv2.FONT_HERSHEY_SIMPLEX, 0.7, (255,255,255), 1, cv2.LINE_AA)
                cv2.putText(image, str(counter_left), 
                            (20,90), 
                            cv2.FONT_HERSHEY_SIMPLEX, 0.7, (255,255,255), 2, cv2.LINE_AA)
                
                # Stage data
                cv2.putText(image, 'Status', (80,55), 
                            cv2.FONT_HERSHEY_SIMPLEX, 0.7, (255,255,255), 1, cv2.LINE_AA)
                cv2.putText(image, stage_left, 
                            (80,90), 
                            cv2.FONT_HERSHEY_SIMPLEX, 1, (255,255,255), 2, cv2.LINE_AA)
                
                if(seconds <= 0):
                    cv2.putText(image, 'time is up', (100,200), 
                            cv2.FONT_HERSHEY_SIMPLEX, 3, (0,0,255), 2, cv2.LINE_AA)
                
                # Render detections
                mp_drawing.draw_landmarks(image, results.pose_landmarks, mp_pose.POSE_CONNECTIONS,
                                        mp_drawing.DrawingSpec(color=(245,117,66), thickness=2, circle_radius=2), 
                                        mp_drawing.DrawingSpec(color=(245,66,230), thickness=2, circle_radius=2) 
                                            )   
                
                        
                cv2.imshow('Mediapipe Feed', image)
                
                if(seconds <= -40):
                    break
                    
                if cv2.waitKey(10) & 0xFF == ord('q'):
                    break

            # cap.release()
            # cv2.destroyAllWindows()
            ret , jpeg = cv2.imencode('.jpg' , frame)
            return jpeg.tobytes()


        