import React from 'react';

import { Gallery } from './Gallery.js';

export default {
  title: 'Example/form',
  component: Gallery,
  parameters: {
    // More on Story layout: https://storybook.js.org/docs/react/configure/story-layout
    
  },
};
let a=15;
export const gallery = (args) => <Gallery data_sys ={gallery.args.data_sys} />;
gallery.args = {
    data_sys : [ { fale_name: "img/1.jpg", higth: 200, width: 305 },
                 { fale_name: "img/2.jpg", higth: 200, width: 305 },
                 { fale_name: "img/3.jpg", higth: 200, width: 305 },
                 { fale_name: "img/4.jpg", higth: 200, width: 305 },
                 { fale_name: "img/5.jpg", higth: 200, width: 305 },
                 { fale_name: "img/6.jpg", higth: 200, width: 305 },
                 { fale_name: "img/8.jpg", higth: 200, width: 305 },
                 { fale_name: "img/8.jpg", higth: 200, width: 305 }
],
    label: 'Button',
    odd: 10,
  };