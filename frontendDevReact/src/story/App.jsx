import React, { useState, useRef} from 'react';
import './App.css';
import kolokolAnimeImg from './img/kolokol-anime.gif';
import kolokolStatImg from './img/kolokol-stat.gif';

import imageFile1 from './img/settings.jpg';
import {Gallery}   from './component/gallery/Gallery';
import { BlockingLayer } from './component/BlockingLayer';
import { SettingsWin } from './component/SettingsWin';
import { WinLog } from './component/WinLog';



export const App = (props) => {
 
 const [showSettingsWin, set_SettingsWin] = useState(true);
 const [showBlockingLayer, set_BlockingLayer] = useState(true);
 const [showWinLog, set_WinLog] = useState(true);
 

  const visibleSettingsWinF = () => {
    set_BlockingLayer(!showBlockingLayer);
    set_SettingsWin(!showSettingsWin);
   
  }
  const visibleWinLogF = () => {
    set_BlockingLayer(!showBlockingLayer);
    set_WinLog(!showWinLog);
    
  }
  return (
    <>
      <div className='top-block'>
        <div className='data'>

          <input type="text" id="data__search" name="search" placeholder="Url загрузки" />
          <input type="submit" id="data__submit" value="Загрузка" />

          <img id="data__bell" onClick={visibleSettingsWinF} src={props.kolokolAnime ? kolokolAnimeImg:kolokolStatImg} alt="колокол" title="Уведомления" />
          <img id="data__settings" onClick={visibleWinLogF} src={imageFile1} alt="колокол" title="Настройки" />

        </div>
      </div>

   <Gallery dataSys={props.data_sys}/>
   <BlockingLayer showBlockingLayer ={showBlockingLayer}/> 

   <SettingsWin showSettingsWin ={showSettingsWin}  VisibleSettingsWinF={visibleSettingsWinF}/>
   <WinLog showWinLog={showWinLog} VisibleWinLogF={visibleWinLogF}/>
    </>
  );


}


