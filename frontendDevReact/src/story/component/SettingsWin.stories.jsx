import React from 'react';
import { SettingsWin } from './SettingsWin.js';

export default {
  title: 'Gallery/form',
  component: SettingsWin,
  parameters: {
    // More on Story layout: https://storybook.js.org/docs/react/configure/story-layout
    
  },
};

export const settingsWin = (args) => <SettingsWin {...args}/>;