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
export const gallery = (args) => <Gallery dataSys ={gallery.args.data_sys} />;
gallery.args = {
    data_sys : [ { fale_name: "img/1.jpg", higth: 200, width: 207 },
                 { fale_name: "img/2.jpg", higth: 200, width: 254 },
                 { fale_name: "img/3.jpg", higth: 200, width: 308 },
                 { fale_name: "img/4.jpg", higth: 200, width: 352 },
                 { fale_name: "img/5.jpg", higth: 200, width: 400 },
                 { fale_name: "img/6.jpg", higth: 200, width: 305 },
                 { fale_name: "img/8.jpg", higth: 200, width: 150 },
                 { fale_name: "img/9.jpg", higth: 200, width: 317 },
                 { fale_name: "img/10.jpg", higth: 200, width: 207 },
                 { fale_name: "img/11.jpg", higth: 200, width: 254 },
                 { fale_name: "img/12.jpg", higth: 200, width: 170 },
                 { fale_name: "img/13.bmp", higth: 200, width: 352 },
                 { fale_name: "img/14.png", higth: 200, width: 250 },
                 { fale_name: "img/15.png", higth: 200, width: 325 },
                 { fale_name: "img/16.webp", higth: 200, width: 150 },
                 { fale_name: "img/17.png", higth: 200, width: 317 }
],
    label: 'Button',
    odd: 10,
  };