let bars = document.querySelector(".bars")
let chat_sidese = document.querySelector(".chat_sidese")
let fri_side = document.querySelector(".fri_side")
let closes = document.querySelector(".closes")

bars.addEventListener( "pointerdown", function ()
{ 
    chat_sidese.classList.add( "chat_clo" );
    fri_side.classList.add( "navbars" );
} );

closes.addEventListener( "pointerdown", function ()
{ 
    chat_sidese.classList.remove( "chat_clo" );
    fri_side.classList.remove( "navbars" );
} );

let eliplse = document.querySelector( ".eliplse" );
let simdim = document.querySelector( ".simdim" );
let wanted_d = document.querySelector( ".wanted_d" )


eliplse.addEventListener( "pointerdown", function ()
{ 

    simdim.classList.add("smd")
    wanted_d.classList.add("wan")
    
} )


simdim.addEventListener( "pointerdown", function ()
{ 

    simdim.classList.remove("smd")
    wanted_d.classList.remove("wan")
    
})



let video_up = document.querySelector(".video_up")
let upload_img = document.querySelector(".upload_img")
let close_bgn = document.querySelector(".close_bgn")

video_up.addEventListener( "pointerdown", function ()
{ 
    upload_img.classList.add( "mainma" );
} );

close_bgn.addEventListener( "pointerdown", function ()
{ 
    upload_img.classList.remove( "mainma" );
})

