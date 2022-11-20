import React from 'react';

import { Form } from './Form';

export default {
  title: 'Example/form',
  component: Form,
  parameters: {
    // More on Story layout: https://storybook.js.org/docs/react/configure/story-layout
    
  },
};

const Template = (args) => <Form {...args} />;

export const setting = Template.bind({});
setting.args = {
 
};

