import React from 'react';
//import './App.css';

export const SettingsWin = ({showSettingsWin, VisibleSettingsWinF}) => {

//   const DataCap = {
//     display: "none"
// }


  return (
   
    <div className="settings-win" style={showSettingsWin?{display: "none"}:{display: "block"}} >
        <div>
          <div className="settings-win__close" onClick={VisibleSettingsWinF}>X</div>
          <h2>Настройки</h2>

          <input type="text" id="settings-win__width" name="search" placeholder="" maxLength="4" />
          <span >&nbsp;&nbsp;&nbsp;Мин ширина 100-6000</span>
          <br></br>
          <input type="text" id="settings-win__heigth" name="search" placeholder="" maxLength="4" />
          <span>&nbsp;&nbsp;&nbsp;Мин ширина 200-4000</span>
          <br></br>

          <input type="checkbox" name="yourName" className="settings-win__checkbox" /> <>Удалить все картинки из галереи</>
          <input type="submit" className="settings-win__submit" value="Применить" />
        </div>
    </div>
  );


}