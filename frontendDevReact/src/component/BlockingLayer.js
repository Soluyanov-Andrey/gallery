import React from 'react';
// import './App.css';

export const BlockingLayer = ({showBlockingLayer}) => {
  return (
    <div className="blocking-layer" style={showBlockingLayer ? {display: "none"}:{display: "block"}}></div>
  );
}