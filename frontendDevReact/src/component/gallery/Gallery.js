import React, { useState, useEffect } from 'react';
//import './App.css';
import calculatingNewArray from './calculatingNewArray.js'

export const Gallery = ({ dataSys }) => {

  const [arrayWidth,setArrayWidth] = useState([]);
  const [Width,setWidth] = useState(1);

  function newArray(dataSys){

    let widthArray =[];
    
    dataSys.map((item) => {

       widthArray.push(item.width);
    });

    return widthArray;
  }

  let initialArray = newArray(dataSys);
  



  let windowResize = () => {

    let clientWidth = document.body.clientWidth;

    let arrayNewWidth= calculatingNewArray(initialArray, clientWidth);
  
    setWidth(clientWidth);
    setArrayWidth(arrayNewWidth);
    

  };


  useEffect(() => {

    window.addEventListener("resize", windowResize);
  },[]);


  const elements = dataSys.map((item, index) => {
    
    return (
      <div key={index} className="gallery__block" style={{ width: `${arrayWidth[index]}px` }}>
        <img className="gallery__loader" src="img/loader.gif" />
        <img src={item.fale_name} width={item.width} height="200" />
      </div>
    );
  });
 
  return (
    <div className='gallery'style={{ width: `${Width}px` }} >
      {elements}
    </div>
  );


}
