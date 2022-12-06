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
 const [showSettingsWin, set_SettingsWin] = useState(true);
 const [showBlockingLayer, set_BlockingLayer] = useState(true);
 const [showWinLog, set_WinLog] = useState(true);

  const VisibleSettingsWinF = () => {
    set_BlockingLayer(!showBlockingLayer);
    set_SettingsWin(!showSettingsWin);
   
  }
  const VisibleWinLogF = () => {
    set_BlockingLayer(!showBlockingLayer);
    set_WinLog(!showWinLog);
    
  }
  return (
    <>
      <div className='top-block'>
        <div className='data'>

          <input type="text" id="data__search" name="search" placeholder="Url загрузки" />
          <input type="submit" id="data__submit" value="Загрузка" />

          <img id="data__bell" onClick={VisibleSettingsWinF} src={imageFile} alt="колокол" title="Уведомления" />
          <img id="data__settings" onClick={VisibleWinLogF} src={imageFile1} alt="колокол" title="Настройки" />

        </div>
      </div>

   <Gallery/>
   <BlockingLayer showBlockingLayer ={showBlockingLayer}/> 

   <SettingsWin showSettingsWin ={showSettingsWin}  VisibleSettingsWinF={VisibleSettingsWinF}/>
   <WinLog showWinLog={showWinLog} VisibleWinLogF={VisibleWinLogF}/>
    </>
  );


}


