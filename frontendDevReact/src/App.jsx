import React from 'react';
import './App.css';
import imageFile from './../public/bell-static.gif';
import imageFile1 from './../public/settings.jpg';


export const App = () => {
  return (
    <>
      <div className='top-block'>
        <div className='data'>

          <input type="text" id="data__search" name="search" placeholder="Url загрузки" />
          <input type="submit" id="data__submit" value="Загрузка" />

          <img id="data__bell" src={imageFile} alt="колокол" title="Уведомления" />
          <img id="data__settings" src={imageFile1} alt="колокол" title="Настройки" />

        </div>
      </div>



      

      

   






    </>
  );


}


