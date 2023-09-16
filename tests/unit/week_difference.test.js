const calculateWeekDifference = require('../../WeekDifferentCalculator.js');

test('calculates week difference correctly', () => {
  const registrationDate = new Date();
  registrationDate.setDate(registrationDate.getDate() - 28);

  const weeksDifference = calculateWeekDifference(registrationDate);

  expect(weeksDifference).toBe(4);
});

