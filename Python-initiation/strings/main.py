#a = 'HAL 9000'
#print(a)

from itertools import count
from typing import Counter


hello = 'HELLO'
print(hello)

world = 'WORLD'

messag = hello + ', ' + world + '!'
print(messag)
print(len(messag))

def total_elements(list):
    count = 0
    for element in list:
        count += 1
    return count

print("The total number of elements in the list: ", total_elements(messag))

for letter in messag:
    if letter == "l" :
        Counter = Counter + 1
        total = Counter
print(total)