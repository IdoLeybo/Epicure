jQuery(document).ready(function($) {

    // ----- Function To Filter The Restaurants Page ------ //
    $('.myHref').on('click', function(event) {
        event.preventDefault();
        // window.location = `http://bedrock-local.co.il/allrestaurants/#${event.target.id}`
        // window.location = `${process.env.WP_HOME}/allrestaurants/#${event.target.id}`

        const all = document.getElementById("all-Div");
        const newDiv = document.getElementById("new-Div");
        const popular = document.getElementById("popular-Div")
        const open = document.getElementById("open-Div");

        // Add & Remove class for styling
            document.getElementById('all').classList.remove('current-filter')
            document.getElementById('new').classList.remove('current-filter')
            document.getElementById('popular').classList.remove('current-filter')
            document.getElementById('open').classList.remove('current-filter')

        if(event.target.id) {
            document.getElementById(event.target.id).classList.add('current-filter')
        } else {
            // default variable
            document.getElementById('all').classList.add('current-filter')
        }

        all.style.display = "none";
        newDiv.style.display = "none";
        popular.style.display = "none";
        open.style.display = "none";

        event.target.id == 'open' ?
            open.style.display = "flex"
            : event.target.id == 'popular' ?
                popular.style.display = "flex"
                : event.target.id == 'new' ?
                    newDiv.style.display = "flex"
                    :
                    all.style.display = "flex";
    });

    // ----- Function To Filter The Single Restaurant Page ------ //
    $('.dishHref').on('click', function(event) {
        event.preventDefault();

        const breakfast = document.getElementById("breakfast-Div")
        const lunch = document.getElementById("lunch-Div")
        const dinner = document.getElementById("dinner-Div")

        // Add & Remove class for styling
        document.getElementById('breakfast').classList.remove('current-dish-filter')
        document.getElementById('lunch').classList.remove('current-dish-filter')
        document.getElementById('dinner').classList.remove('current-dish-filter')

        document.getElementById(event.target.id).classList.add('current-dish-filter')

        breakfast.style.display = "none";
        lunch.style.display = "none";
        dinner.style.display = "none";

        event.target.id == 'dinner' ?
            dinner.style.display = "flex"
            : event.target.id == 'lunch' ?
                lunch.style.display = "flex"
                :
                breakfast.style.display = "flex"
    });

});

