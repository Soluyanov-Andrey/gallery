import React, { useState, useEffect } from 'react';
//import './App.css';
import calculatingNewArray from './calculatingNewArray.js'

export const Gallery = ({ dataSys }) => {

  // let initialArray = [350,200,180,400, 174,245,350,150,110, 280,400];
  // let initialWindowWidth = 1000;

  // let d= calculatingNewArray(initialArray, initialWindowWidth);
  // console.log(d);

  let k = -1;

  
  let windowResize = () => {
    console.log(document.body.clientWidth);

  };



  useEffect(() => {
    window.addEventListener("resize", windowResize);
  });


  const elements = dataSys.map((item) => {
    console.log(item);
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

    // //${props.img_width[k]}
    return (
      <div key={k} className="gallery__block" style={{ width: `${item.width}px` }}>
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
