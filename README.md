# 'K'reating the Krusty Order From
This challenging challenge that challenges all challengers, is a little more challenging than your average challenge.
The short version is, that we need to create an order form for customers that would like to buy sandwiches, or in my case, Krabby Patties (from the cartoon Spongebob).
And the long version shall be written down below!

## 🌱 Must-have features

### Preparation
- [x] Have a look at the provided structure: you get both an index file and another file containing a form. How are these two working together? 
- [x] Think of a funny / surprising / original name for a store that should definitely exist. (fancy suits for cats? bongo for dates? you name it!)
- [x] Think of some products to sell (feel free to be creative) and update the products array with these.
- [x] Check if all the products & prices are currently visible in the form.

### Step 1: accepting orders
- [x] Show an order confirmation when the user submits the form. This should contain the chosen products and delivery address.
- [x] We will learn how to save this information to a database later, so no need to do this now.

### Step 2: validation
- [ ] Use PHP to check the following:
    - [ ] Required fields are not empty.
    - [ ] Zip code are only numbers.
    - [ ] Email address is valid.
- [ ] Show any problems (empty or invalid data) with the fields at the top of the form. Tip: use the [bootstrap alerts](https://getbootstrap.com/docs/4.0/components/alerts/) for inspiration. If they are valid, the confirmation of step 1 is shown.
- [ ] If the form was not valid, show the previous values in the form so that the user doesn't have to retype everything.

> Usually, validation is a combination of server side checks (for security, these can't be bypassed) and checks in html / JS (can be bypassed but can give live user feedback).

### Step 3: improve UX by saving user data
- [ ] Check out the possibilities of the PHP session and cookies.
- [ ] We want to prefill the address (you can just use any previous user input, we don't need to get data from anywhere else), as long as the browser isn't closed. Which of these techniques is the better choice here?

> When using cookies on a live site, check any legal requirements.

## 🌼 Nice-to-have features (doable)

### Expanding due to success
- [ ] Read about `get` variables and what you can do with it.
- [ ] Find commented navigation and activate it. Tweak the content for your own store.
- [ ] Make a second category of products, and provide a new array for this info.
- [ ] The navigation should work as a toggle to switch between the two categories of products.

### Bulk orders
- [ ] Allow the user to specify how much he or she wants to buy of a certain products

### Look & feel
- [ ] What kind of style would suit your store? Add a color schema and a suitable font.
- [ ] Check what you can do for validation with html and JS. Use this to improve your validation.

## 🌳 Nice-to-have features (hard)

### Delivery times
- [ ] Show the expected delivery time in the confirmation message (2h by default).
- [ ] A user can opt for express delivery (5$ for delivery in 45min).

### Statistics
- [ ] Show statistics about how much money has been spent. This info should be kept (can you use the session or cookies for this?) when the browser closes.
- [ ] Include the most popular product (by this user) and amount of products bought by this user.

#### And that's that for all the details regarding this challenge. From here on out, you can read through my own ups and downs while working on this challenge, some tips that I might have discovered, or some dumb jokes I'll come up with!
#### I also added checklists to all the featured that the website needs, so that I can keep up with everything and you, my dear reader, can understand which features are active and which aren't.

## Unofficial Official Launch of the Krusty Krab
As a hardcore Spongebob enthusiast, BubbleBlower extraordinaire, and Jefflyfish catcher in training, I have chosen to use the Krusty Krab as the theme for this challenge.
I'll be adding the menu from the Krusty Krab itself to the order list.

## Having a Con'Firm' Grasp on PHP
The confirmation order is something that I struggled a **LOT** with.
But, now that I was able to finally able to figure it out *(with the help of the awesome coaches at BeCode)* I believe that I've started to understand PHP on a deeper level.

What troubled me was that I was unable to show the products that the user has selected.
I was able to get the index numbers of the array of products that the user had chosen, but I was unable to mix that together with the array of products itself.
One of the coaches told me that I should look into the array_keys() function.
And just like that it felt as if I could see clearly again for the first time in 37 years, which is weird since I'm still 25 years old.

The code I ended up writing ended up looking something like this:
````
function validate(array $originalProducts) {
  $arrayKeysProducts = array_keys($_POST["products"]);
  
  for ($i = 0; $i < count($arrayKeysProducts); $i++){
    echo $originalProducts[$arrayKeysProducts[$i]]["name"];
    echo "<br>";
    }
  }
````
I'm glad I encountered such a difficult PHP challenge this early on.
Because of it, I learned a lot about keys, the way global variables are structured in PHP, and *a lot about myself!*
Like Patrick taught me when I was little, I need to firmly grasp stuff if I want to learn them.


![firmly-grasp-it](images/firmlygraspit.gif)

## Validation !== Vacation
If there's one thing that's certain about learning PHP, it's that you'll get more often stuck than a snail in a glue factory.
But, these are challenges worth overcoming, even though they can be infuriating at times.
Currently 