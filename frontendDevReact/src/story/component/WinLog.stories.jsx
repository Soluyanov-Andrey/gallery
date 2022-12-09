import React from 'react';
import { WinLog } from './WinLog.js';

export default {
  title: 'Gallery/form',
  component: WinLog,
  parameters: {
    // More on Story layout: https://storybook.js.org/docs/react/configure/story-layout
    
  },
};

export const winLog = (args) => <WinLog {...args}/>;
