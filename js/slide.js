


imagemJson.map((item,index)=>{
    let imgItem = document.querySelector('.slider .slider--item').cloneNode(true);
    console.log(imgItem)

    document.querySelector('.slide .slide-width').append(imgItem);

    imgItem.querySelector('.slide .slider--item img').src = item.img;
    
   
});









let currentSlide = 0;

let slideTotal = document.querySelectorAll('.slider--item').length;

document.querySelector('.slide-width').style.width = `calc(100vw * ${slideTotal})`;



const passar = () =>{
    currentSlide++;
    if(currentSlide > (slideTotal - 1)){
        currentSlide = 0;
    }
    updateMargin();
}


const updateMargin = () =>{
    let slideItemWidth= document.querySelector('.slider--item').clientWidth;
    let newMargin = (currentSlide * slideItemWidth);
    document.querySelector('.slide-width').style.marginLeft = `${-newMargin}px`;
}

setInterval(passar, 5000);

















/*Enviar Img */


const enviarFoto = () =>{
    let foto = document.querySelector('.foto').files[0];

    console.log(foto)
}

