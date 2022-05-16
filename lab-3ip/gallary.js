let numberImage = 1;
const countImage = 6;
const pathImages = "img/gallary/";
const countDiv = 15;
const speed = 50;

function generateImage(){
    let widthDiv = 600/countDiv;
    let image = pathImages+"0"+numberImage+".jpg";

    for (let i=0; i<countDiv; i++){

        let item = $("<div></div>");
        item.addClass("elementImage");

        item.css("width",widthDiv+"px");
        item.css("background-image",'url('+image+')');
        item.css("background-position-x", - i*widthDiv+"px");
        $( "#mainImage" ).append(item);
    }

}

function changeImage() {

    let image = pathImages + "0" + numberImage + ".jpg";
    let i = 5;
    let j = 5;

    $("#mainImage div").each(function () {

        $(this).hide(speed * j, function () {
            $(this).css("background-image", 'url('+image+')');
            $(this).show(speed * i);
        });
        i++;
    });

}



/*Левый клик */
function leftChangeImage() {
    if(numberImage > 1)
        numberImage--;
    else
        numberImage = countImage;
    changeImage()
}


/*Правый клик */
function rightChangeImage() {
    if (numberImage < countImage)
        numberImage++;
    else
        numberImage = 1;
    changeImage()
}

document.addEventListener('DOMContentLoaded', function(){
    generateImage();
});