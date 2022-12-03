import React from 'react';
import './App.css';
import imageFile from './../public/bell-static.gif';
import imageFile1 from './../public/settings.jpg';


export const App = () =>  {
  return (
  <>
    <div className='top-block'>
    
       <div className='data'>

        <input  type="text" id="data-search" name="search" placeholder="Url загрузки" />
        <input  type="submit" id="data-submit" value="Загрузка" />


        <img id="bell" src={imageFile} alt="колокол" title="Уведомления" />
        <img id="settings" src={imageFile1} alt="колокол" title="Настройки" />

        </div>
        
      
    </div>

    <div className='gallery'>

    </div>
  </>
  );
}


