import React, { useState, useEffect } from 'react';
//import './App.css';
import calculatingNewArray from './calculatingNewArray.js'

export const Gallery = ({ dataSys }) => {

  const [arrayWidth,setArrayWidth] = useState(1);
  // let initialArray = [350,200,180,400, 174,245,350,150,110, 280,400];
  // let initialWindowWidth = 1000;

  // let d= calculatingNewArray(initialArray, initialWindowWidth);
  // console.log(d);
 
  let k = -1;
  // console.log(arrayWidth);
  function newArray(dataSys){
    let widthArray =[];
    
    dataSys.map((item) => {

       widthArray.push(item.width);
    });
    return widthArray;
  }

  let initialArray = newArray(dataSys);
  
  // let d= calculatingNewArray(initialArray, 1000);
  let windowWidth = function () {
    var ww = document.documentElement;
    return self.innerWidth || (ww && ww.clientWidth) || document.body.clientWidth;
}

  // document.body.clientWidth
  let windowResize = () => {
    let d= calculatingNewArray(initialArray, 1000);
    console.log(windowWidth());
    console.log(document.documentElement.clientWidth );
    setArrayWidth(d);
   
    // setArrayWidth(150);
    //  console.log(d);
    
    // console.log(d);

  };



  useEffect(() => {
    // setArrayWidth(arrayWidth+1);
    // console.log(arrayWidth);
    window.addEventListener("resize", windowResize);
  },[]);


  const elements = dataSys.map((item, index) => {
    
    // // for (let q = 0; q < props.data.length; ++q) {
    k = k + 1;
    
    // //console.log(props.csswidth[0]);
    // const searhStyle = {
    //     'float': 'left',
    //     'margin': '0px 1px 10px',
    //     'overflow': 'hidden',
    //     'position': 'relative',
    //     'width': `${csswidth[k]}px`,
    //     'height': '200px'
    // };
    // arrayWidth[index]
    // //${props.img_width[k]}
    return (
      <div key={k} className="gallery__block" style={{ width: `${arrayWidth[index]}px` }}>
        <img className="gallery__loader" src="img/loader.gif" />
        <img src={item.fale_name} width={item.width} height="200" />
      </div>
    );
  });
 
  return (
    <div className='gallery'>
      {elements}
    </div>
  );


}
