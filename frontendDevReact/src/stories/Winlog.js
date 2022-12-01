import React from 'react';
import PropTypes from 'prop-types';
import './Winlog.css';

export const Winlog = () => {
  
  return (
    <div id="openModal" className="modalDialog">
      <div>
        <div id="knopka" className="close">X</div>
        <h2>Че проиcходит?</h2>
        <div id="messages" className="messages">
          текст текст текст
        </div>
      </div>
    </div>

  );
};