const calculateWeekDifference = require('../../WeekDifferentCalculator.js');

test('calculates week difference correctly', () => {
  const registrationDate = new Date();
  registrationDate.setDate(registrationDate.getDate() - 28);

  const weeksDifference = calculateWeekDifference(registrationDate);

  expect(weeksDifference).toBe(4);
});

test('calculates week difference for 8 weeks', () => {
  const registrationDate = new Date();
  registrationDate.setDate(registrationDate.getDate() - 56); // Subtract 56 days for 8 weeks

  const weeksDifference = calculateWeekDifference(registrationDate);

  expect(weeksDifference).toBe(8);
});

