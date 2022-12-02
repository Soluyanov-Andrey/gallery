import React from 'react';
import PropTypes from 'prop-types';
import './Floatblock.css';
import imageFile from './assets/kolokol-stat.gif';
import imageFile1 from './assets/nastroiki.jpg';
// const image = {
//   src: imageFile,
//   alt: 'my image',
// };
// const image1 = {
//   src: imageFile1,
//   alt: 'my image',
// };

export const Floatblock = () => {

const [user, setUser] = React.useState();

  return (
    <div id="float-block" className="float-block">

      <div id="shapka">
        <div id="showScroll"></div>

        <input  type="text" id="txt" name="search" placeholder="Url загрузки" />
        <input  type="submit" id="btn" value="Загрузка" />


        <img id="kolokol" src={imageFile} alt="колокол" title="Уведомления" />
        <img id="nastroiki" src={imageFile1} alt="колокол" title="Настройки" />

      </div>

    </div>

  );
};

