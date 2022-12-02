import React from 'react';

import { Setting } from './Setting';

export default {
  title: 'Example/form',
  component: Setting,
  // argTypes: { even: { control: { type: 'number', min:1, max:30, step: 2 } }  },
 
  parameters: {
    // More on Story layout: https://storybook.js.org/docs/react/configure/story-layout
  
  },
};

 const Template = (args) => <Setting {...args} />;

export const setting = Template.bind({});
setting.args = {
   
};
