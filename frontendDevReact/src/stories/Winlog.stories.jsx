import React from 'react';

import { Winlog } from './Winlog';

export default {
  title: 'Example/form',
  component: Winlog,
  parameters: {
    // More on Story layout: https://storybook.js.org/docs/react/configure/story-layout
    
  },
 
};

export const winlog = (args) => <Winlog {...args} />;
