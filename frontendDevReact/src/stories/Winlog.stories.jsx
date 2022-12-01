import React from 'react';

import { Winlog } from './Winlog';

export default {
  title: 'Winlog',
  component: Winlog,
  parameters: {
    // More on Story layout: https://storybook.js.org/docs/react/configure/story-layout
    
  },
 
};

export const kk = (args) => <Winlog {...args} />;
