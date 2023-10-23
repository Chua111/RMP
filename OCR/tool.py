import cv2
import pytesseract
from PIL import Image
import numpy as np

pytesseract.pytesseract.tesseract_cmd = r"D:\Programs\tesseract-ocr\tesseract.exe"


def ocr_core(img):
    text = pytesseract.image_to_string(img)
    return text

def get_greyscale(img):
    return cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)

def remove_noise(img):
    return cv2.medianBlur(img, 5)

def thresholding(img):
    return cv2.threshold(img, 0, 255, cv2.THRESH_BINARY + cv2.THRESH_OTSU)[1]


img = cv2.imread('license.jpeg')
img = cv2.resize(img, None, fx=1.2, fy=1.2, interpolation=cv2.INTER_CUBIC)
img = get_greyscale(img)
img = thresholding(img)
img = remove_noise(img)

info = (ocr_core(img))
with open('info.txt', 'w', encoding='utf-8') as f:
    f.write(info)
