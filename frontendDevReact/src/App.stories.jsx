import React from 'react';

import { App } from './App.jsx';

export default {
  title: 'Example/form',
  component: App,
  parameters: {
    // More on Story layout: https://storybook.js.org/docs/react/configure/story-layout
    
  },
};

export const app85 = (args) => <App {...args} />;