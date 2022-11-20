import React from 'react';
import PropTypes from 'prop-types';
import './Winlog.css';

export const Winlog = () => {
  
  return (
    <div id="openModal" class="modalDialog">
      <div>
        <div id="knopka" class="close">X</div>
        <h2>Че проиcходит?</h2>
        <div id="messages" class="messages">
          текст текст текст
        </div>
      </div>
    </div>

  );
};