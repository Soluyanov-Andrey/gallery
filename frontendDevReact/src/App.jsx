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



      <div className='gallery'></div>

      <div className="blocking-layer"></div>

      <div className="settings-win">
        <div>
          <div className="settings-win__close">X</div>
          <h2>Настройки</h2>

          <input type="text" id="settings-win__width" name="search" placeholder="" maxlength="4" />
          <span >&nbsp;&nbsp;&nbsp;Мин ширина 100-6000</span>
          <br></br>
          <input type="text" id="settings-win__heigth" name="search" placeholder="" maxlength="4" />
          <span>&nbsp;&nbsp;&nbsp;Мин ширина 200-4000</span>
          <br></br>

          <input type="checkbox" name="yourName" id="settings-win__checkbox" /> <>Удалить все картинки из галереи</>
          <input type="submit" id="settings-win__submit" value="Применить" />
        </div>
      </div>

      <div className="win-log">
          <div>
            <div class="win-log__close">X</div>
            <h2>События на сервере.</h2>

            <div id="messages" class="messages">
                       jkjkjkj kjkjkjkj jkjkjk jkjk jkjkjkj 
                       jkjkjkj kjkjkjkj jkjkjk jkjk
                       jkjkjkj kjkjkjkj jkjkjk jkjk
                       kjkjkjkj jkjkjk jkjk hhy yyyh yh y
                       jkjkjkj kjkjkjkj jkjkjk jkjk jkjkjkj 
                       jkjkjkj kjkjkjkj jkjkjk jkjk
                       jkjkjkj kjkjkjkj jkjkjk jkjk
                       kjkjkjkj jkjkjk jkjk hhy yyyh yh y
                       jkjkjkj kjkjkjkj jkjkjk jkjk jkjkjkj 
                       jkjkjkj kjkjkjkj jkjkjk jkjk
                       jkjkjkj kjkjkjkj jkjkjk jkjk
                       kjkjkjkj jkjkjk jkjk hhy yyyh yh y
            </div>
          </div>
        
      </div>




    </>
  );


}


