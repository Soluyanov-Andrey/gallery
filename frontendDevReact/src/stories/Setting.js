import React from 'react';
import PropTypes from 'prop-types';
import './Setting.css';

export const Setting = () => {
  
  const DataCap = {
    display: "block"
}
  return (

    <div id = "setting" style={DataCap}>
      <div id="win_setting" class="modalDialog">
        <div>
           <div id="knopka_n" class="close">X</div>
           <h2></h2>
            
           <input  type="text" id="width" name="search" placeholder=""  maxlength="4"/><>&nbsp;&nbsp;&nbsp;Мин ширина 100-6000</>
           <input type="text" id="width" name="search" placeholder=""  maxlength="4"/><>&nbsp;&nbsp;&nbsp;Мин ширина 200-4000</>  
           <br></br>
           <input type="checkbox" name="yourName" id="ch1"/> <>Удалить все картинки из галереи</>
           <input type="submit" id="button1" value="Применить"/>
        </div>
        

      </div>
    </div>
  );
};

