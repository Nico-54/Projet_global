(function ()
{

    var scrollY = function()
    {
        var supportPageOffset = window.pageXOffset !== undefined;
        var isCSS1Compat = ((document.compatMode || "") === "CSS1Compat");
        return supportPageOffset ? window.pageYOffset : isCSS1Compat ? document.documentElement.scrollTop : document.body.scrollTop;
    }

    var elements = document.querySelectorAll('[data-sticky]')
    for (var i = 0; i < elements.length; i++) 
    {
        (function(element) 
        {

            //Variables
            var rect = element.getBoundingClientRect();
            var offset = parseInt(element.getAttribute('data-offset') || 0, 10);
            if (element.getAttribute('data-constraint'))
            {
                var constraint = document.querySelector(element.getAttribute('data-constraint'));
            } else 
            {
                var constraint = document.body;
            }

            var constraintRect = constraint.getBoundingClientRect();
            var constraintBottom = constraintRect.top + scrollY() + constraintRect.height - offset - rect.height;
            var top = rect.top + scrollY();
            var fake = document.createElement('div');
            fake.style.width = rect.width + "px";
            fake.style.height = rect.height + "px";



    //Fonctions
    var onScroll = function()
    {
        if (scrollY() > constraintBottom && element.style.position != 'absolute')
        {
            element.style.position = 'absolute';
            element.style.bottom = '0';
            element.style.top = 'auto';

        } else if (scrollY() > top - offset && scrollY() < constraintBottom && element.style.position != 'fixed')
        {
            element.classList.add('fixed');
            element.style.position = 'fixed';
            element.style.top = offset +"px";
            element.style.bottom = 'auto';
            element.style.width = rect.width + "px"; 
            element.parentNode.insertBefore(fake, element)
     
        } else if (scrollY() < top - offset && element.style.position != 'static') 
        {
            element.classList.remove('fixed');
            element.style.position = 'static';

        if (element.parentNode.contains(fake))
        {
            element.parentNode.removeChild(fake);
        } else 
        {

        }
        } 
    }

    var onResize = function()
    {
        element.style.width = "auto";
        element.classList.remove('fixed');
        element.srtyle.position = "static";
        fake.style.display = "none";
        rect = element.getBoundingClientRect();
        constraintRect = constraint.getBoundingClientRect();
        constraintBottom = constraintRect.top + scrollY() + constraintRect.height - offset - rect.height;
        top = rect.top + scrollY();
        fake.style.width = rect.width + "px";
        fake.style.height = rect.height + "px";
            fake.style.display = "block";
        onScroll();
    }

    //Listener
    window.addEventListener('scroll', onScroll);
    window.addEventListener('resize', onResize);
        
    })(elements[i])
}
    
})()