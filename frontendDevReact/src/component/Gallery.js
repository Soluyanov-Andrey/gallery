import React from 'react';
//import './App.css';

export const Gallery = ({data_sys}) => {
 
      let k= -1;
      const elements = data_sys.map((item) => {
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
        <div key={k} className="gallery__block" style={{width: "250px"}}>
          <img className="gallery__loader" src="img/loader.gif"/>
          <img src="img/3.jpg" width="250" height="200"/>
        </div>
      );
  });

  return (
    <div className='gallery'>
      {elements}
    </div>
  );


}
