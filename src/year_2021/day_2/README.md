# Problem:

--- Day 2: Dive! ---
Now, you need to figure out how to pilot this thing.

It seems like the submarine can take a series of commands like forward 1, down 2, or up 3:

forward X increases the horizontal position by X units.
down X increases the depth by X units.
up X decreases the depth by X units.
Note that since you're on a submarine, down and up affect your depth, and so they have the opposite result of what you might expect.

The submarine seems to already have a planned course (your puzzle input). You should probably figure out where it's going. For example:

```
forward 5
down 5
forward 8
up 3
down 8
forward 2
```

Your horizontal position and depth both start at 0. The steps above would then modify them as follows:

forward 5 adds 5 to your horizontal position, a total of 5.
down 5 adds 5 to your depth, resulting in a value of 5.
forward 8 adds 8 to your horizontal position, a total of 13.
up 3 decreases your depth by 3, resulting in a value of 2.
down 8 adds 8 to your depth, resulting in a value of 10.
forward 2 adds 2 to your horizontal position, a total of 15.
After following these instructions, you would have a horizontal position of 15 and a depth of 10. (Multiplying these together produces 150.)

Calculate the horizontal position and depth you would have after following the planned course. What do you get if you multiply your final horizontal position by your final depth?

--- Part Two ---
Based on your calculations, the planned course doesn't seem to make any sense. You find the submarine manual and discover that the process is actually slightly more complicated.

In addition to horizontal position and depth, you'll also need to track a third value, aim, which also starts at 0. The commands also mean something entirely different than you first thought:

down X increases your aim by X units.
up X decreases your aim by X units.
forward X does two things:
It increases your horizontal position by X units.
It increases your depth by your aim multiplied by X.
Again note that since you're on a submarine, down and up do the opposite of what you might expect: "down" means aiming in the positive direction.

Now, the above example does something different:

forward 5 adds 5 to your horizontal position, a total of 5. Because your aim is 0, your depth does not change.
down 5 adds 5 to your aim, resulting in a value of 5.
forward 8 adds 8 to your horizontal position, a total of 13. Because your aim is 5, your depth increases by 8*5=40.
up 3 decreases your aim by 3, resulting in a value of 2.
down 8 adds 8 to your aim, resulting in a value of 10.
forward 2 adds 2 to your horizontal position, a total of 15. Because your aim is 10, your depth increases by 2*10=20 to a total of 60.
After following these new instructions, you would have a horizontal position of 15 and a depth of 60. (Multiplying these produces 900.)

Using this new interpretation of the commands, calculate the horizontal position and depth you would have after following the planned course. What do you get if you multiply your final horizontal position by your final depth?

---

## My solution:

### Part one:

My first idea was to make three lists: one for each direction. Sum the values of each direction, subtract "down" and "up" and get the product of the previous value with the horizontal direction, but this idea was discarded because I would have to run through the array three times, this was reason enough for me to not like the idea, because it had a complexity of O(n * 3).

I thinked about creating two variables that would store the horizontal position and the vertical position and the command would be just the string "down", "up" or "foward". Again, I had a idea that I didn't liked: create a array of objects wich one key would store the direction and the other would store the value. But did not satisfied me because I would have to run the array 2 times (one to create the list of objects and another one to process the directions and values), and if for each input I had to run through the array two times, I think the complexity would be O(n * 2), wich is not good enough to me.

The last idea, actually was the first of them all (I was just lazy to make it in the first sight), the idea was to run through the array and slice the string to get a direction input and a value and store in one of the two variables from before. For me this is a good idea because for each input, I would run through it just one time (O(n) complexity) and I could not dismiss any element in the list to make the complexity less than that (maybe O(log n), for example?), so this was the most aceptable idea, for me.

### Part two

My english is a bit rusty, there is a few steps before I start to say that I can understand >everything< easily. This was my problem in this day, because I was a bit tired and my english was already all wasted, so I had some problems in understanding some phrases, but everything was just fine, because all I had to do in the part two was add two variables and mathematically modify them in each `if`, no big deal :D