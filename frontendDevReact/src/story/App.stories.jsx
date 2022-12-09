import React from 'react';

import { App } from './App.jsx';

export default {
  title: 'Gallery/form',
  component: App,

  argTypes: {
    kolokolAnime: {
      control: 'boolean',
    }
   
  },

  parameters: {
    // More on Story layout: https://storybook.js.org/docs/react/configure/story-layout
   
  },
};


export const app = (args) => <App {...args} />;

app.args = {
  kolokolAnime: false
};
