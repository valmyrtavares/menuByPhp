const key = document.querySelectorAll("[data-type]");
const target = document.querySelectorAll(".products")
const modalDetail = document.querySelectorAll(".modal-product")
let images = document.querySelectorAll('.carrosel');



// function showHide(){       
//     console.log(key)
//      key.forEach(item =>{
//         item.nextElementSibling.classList.add('hide')
//     })  
//     key.forEach((item, index) => {       
//         item.addEventListener('click', ()=>{
//            testando(index);
//         })
//     })         

// }
function showHide(){
   
    key.forEach((item, index) =>{
        item.addEventListener('click', ()=>{
            testando(index)
        })
    })
}

function testando(index){
   
    // key.forEach(item =>{
    //     item.nextElementSibling.classList.add('hide')
    // })
    key[index].nextElementSibling.classList.toggle('hide')
}
showHide();
modal();


function modal(){  
   
    modalDetail.forEach(item => {
        item.classList.remove('.show')
    })
   
    target.forEach((item, index)=> {
        item.addEventListener('click', ()=>{
            console.log(index)
            modalDetail[index].classList.add('show')
        })
    })
       slideImage()   
}

function onClose(){  
  
    modalDetail.forEach((item, index) => {
       item.addEventListener('click', ()=>{
           tira(index)
       })
    })
    
}
function tira(index){
    console.log('indo')
    modalDetail[index].classList.remove('show')
}

//CARROSSEL





function slideImage(){     
      console.log(images)
    let count = 0;
    const limit = images.length - 1;
    images[limit].classList.add('show')
    setInterval(()=>{
        
        
        images.forEach(item => {
            item.classList.remove('show');
        })
       images[count].classList.add('show')
    
        count++;
        if(count>limit){
        count = 0
        }
    },3000)
}




  


