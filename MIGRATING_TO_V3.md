# Migrating to Spot3 from Spot2

## \Spot\Query

- All calls to `\Spot\Query->with()` must now specify an array of entities to
  eager-load. If you require the old `with()` functionality, you should use
  `getWith()`.
