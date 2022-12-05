import React, { useState, useRef} from 'react';
import './App.css';
import imageFile from './img/bell-static.gif';
import imageFile1 from './img/settings.jpg';
import {Gallery}   from './component/Gallery';
import { BlockingLayer } from './component/BlockingLayer';
import { SettingsWin } from './component/SettingsWin';
import { WinLog } from './component/WinLog';


const handleClick = () => {
    console.log('this это:', this);
  }

export const App = () => {
 const [show, setCount] = useState(true);
  return (
    <>
      <div className='top-block'>
        <div className='data'>

          <input type="text" id="data__search" name="search" placeholder="Url загрузки" />
          <input type="submit" id="data__submit" value="Загрузка" />

          <img id="data__bell" onClick={() => handleClick()} src={imageFile} alt="колокол" title="Уведомления" />
          <img id="data__settings" src={imageFile1} alt="колокол" title="Настройки" />

        </div>
      </div>

   <Gallery/>
   {/* <BlockingLayer/> */}
   <SettingsWin show ={show}/>
   <WinLog/>
    </>
  );


}


