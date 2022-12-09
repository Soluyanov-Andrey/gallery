import React from 'react';
import { BlockingLayer } from './BlockingLayer.js';

export default {
  title: 'Gallery/form',
  component: BlockingLayer,
  argTypes: {
    showBlockingLayer: {
      control: 'boolean',
    }
   
  },
  parameters: {
    // More on Story layout: https://storybook.js.org/docs/react/configure/story-layout
    
  },
};

export const blockingLayer = (args) => <BlockingLayer {...args}/>;
blockingLayer.args = {
  showBlockingLayer: false
  };