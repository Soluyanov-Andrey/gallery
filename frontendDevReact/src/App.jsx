import logo from './logo.svg';
import React from 'react';
import './App.css';
import imageFile from './../public/kolokol-stat.gif';
import imageFile1 from './../public/nastroiki.jpg';


export const App = () =>  {
  return (
  <>
  <div className='data'>
  <div id="float-block" className="float-block">

      <div id="shapka">
        <div id="showScroll"></div>

        <input  type="text" id="txt" name="search" placeholder="Url загрузки" />
        <input  type="submit" id="btn" value="Загрузка" />


        <img id="kolokol" src={imageFile} alt="колокол" title="Уведомления" />
        <img id="nastroiki" src={imageFile1} alt="колокол" title="Настройки" />

      </div>

    </div>
  </div>
  <div className='gallery'>

  </div>
  </>
  );
}


