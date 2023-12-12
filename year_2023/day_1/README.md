# Problem:

--- Day 1: Trebuchet?! ---
Something is wrong with global snow production, and you've been selected to take a look. The Elves have even given you a map; on it, they've used stars to mark the top fifty locations that are likely to be having problems.

You've been doing this long enough to know that to restore snow operations, you need to check all fifty stars by December 25th.

Collect stars by solving puzzles. Two puzzles will be made available on each day in the Advent calendar; the second puzzle is unlocked when you complete the first. Each puzzle grants one star. Good luck!

You try to ask why they can't just use a weather machine ("not powerful enough") and where they're even sending you ("the sky") and why your map looks mostly blank ("you sure ask a lot of questions") and hang on did you just say the sky ("of course, where do you think snow comes from") when you realize that the Elves are already loading you into a trebuchet ("please hold still, we need to strap you in").

As they're making the final adjustments, they discover that their calibration document (your puzzle input) has been amended by a very young Elf who was apparently just excited to show off her art skills. Consequently, the Elves are having trouble reading the values on the document.

The newly-improved calibration document consists of lines of text; each line originally contained a specific calibration value that the Elves now need to recover. On each line, the calibration value can be found by combining the first digit and the last digit (in that order) to form a single two-digit number.

For example:

1abc2
pqr3stu8vwx
a1b2c3d4e5f
treb7uchet
In this example, the calibration values of these four lines are 12, 38, 15, and 77. Adding these together produces 142.

Consider your entire calibration document. What is the sum of all of the calibration values?

Your puzzle answer was 55621.

The first half of this puzzle is complete! It provides one gold star: *

--- Part Two ---
Your calculation isn't quite right. It looks like some of the digits are actually spelled out with letters: one, two, three, four, five, six, seven, eight, and nine also count as valid "digits".

Equipped with this new information, you now need to find the real first and last digit on each line. For example:

two1nine
eightwothree
abcone2threexyz
xtwone3four
4nineeightseven2
zoneight234
7pqrstsixteen
In this example, the calibration values are 29, 83, 13, 24, 42, 14, and 76. Adding these together produces 281.

What is the sum of all of the calibration values?

---

# My solution:

As usual, the first part is easy. I could just iterate over the array once and save the first numeric value I see, and keep track of the latest numeric value that appears, and sum them for each coordinate that I see. But this is not fun, I need to salt things a little bit, the easy path is not always rewarding, and if I came with this solution at first glance, I'll spend a little more time thinking in something else. And 2s after I thought "I'll do it with two pointers".

Is very easy to use two pointers, I just need a guy checking the numeric values from the beginning, and another guy checking the numeric values starting by the end, and since the problem requires me to get the first and last value, this is very handy.

About the time complexity, in short, every coordinate have a possible solution, so the worst case is that the pointers will traverse the whole array, without passing past values that the other point already checked, which is O(n) (maybe not because of this last digit, but it's the only failure in my algorithm, I think). And the best scenario is that both values are in the extremes of the array, so the algorithm just need to check the last and first elements without hanging around in the array, so it's O(1).

---

The second part sucks. Now I need to check for substrings???!!! "Yeah, no. This is no match for me", I innocently thought. And then I notice that my two pointer technique is not very useful anymore. UNLESS I CREATE A DYNAMIC SLIDING WINDOW WITH TWO POINTERS!!!!! And if you read my spaghetti code, you can clearly see that this is not exactly what I did, a dynamic window can be complex/unreadable enough, imagine managing two of them in a problem that I want to solve in like, 20 minutes?

So what I did was a "two pointer substring detector", in other words, I just check for substrings in the coordinates, but I don't do it blindly, I at least had the common sense to just check the substrings which have the length of the spelled digits, because I damn could check for the 1, 2, 3, etc offsets.


So, imagine that you want to check for the spelled digits "two" and "five", in the input ['1aaaaatwo', 'fiveaaaaa2aaaatwo'].

First I'll grab the first coordinate and check for a numeric value, which is 1. While the last pointer will check for a substring with size 3 (since 'two' is 3 letters long) and 4 (since 'five' is 4 letters long), starting with the last element `o`. And he will descend the string checking it until he can make up a substring that is a spelled digit, or if the current value is a numeric value. I know, this is CRAPPY, I'll try to refactor it later, idk, maybe not, maybe I'll leave this here so other people can see what kind of shitty code I do in under 15 minutes (the first 5 out of my 20 spare minutes was me implementing the first part solution and writing the upper half of this text). Okay now I consumed 35 of my 20 free minutes.

Bye
