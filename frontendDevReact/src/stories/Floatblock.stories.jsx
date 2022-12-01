import React from 'react';

import { Floatblock } from './Floatblock';

export default {
  title: 'Example1/Floatblock',
  component: Floatblock,
  // argTypes: { even: { control: { type: 'number', min:1, max:30, step: 2 } }  },
  parameters: {
    // More on Story layout: https://storybook.js.org/docs/react/configure/story-layout
    backgrounds: {
      values: [
        { name: 'red', value: '#f00' },
        { name: 'green', value: '#0f0' },
        { name: 'blue', value: '#00f' },
      ],
    },
  },
};

 const Template = (args) => <Floatblock {...args} />;

export const setting = Template.bind({});
setting.args = {
   control: 'text',
   background: '#ff0',
   size:'md',
};

// export const setting2 = Template.bind({});
// setting2.args = {
//    control: { type: 'number', min:1, max:30, step: 2 } 

// };

// export const setting = {
//   args: {
//     variant: 'primary',
//   },
// };