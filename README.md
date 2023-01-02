# Buto-Plugin-MysqlValidate_date
Form validator.
## Validate two date fields.
```
items:
  date_from:
    type: date
    label: Date from
    validator:
      -
        plugin: mysql/validate_date
        method: validate_less_or_equal
        data:
          field: date_to
  date_to:
    type: date
    label: Date to
```
## Validate first day in month
```
items:
  date_from:
    type: date
    label: Date from
    validator:
      -
        plugin: mysql/validate_date
        method: validate_first_day_in_month
```
## Validate last day in month
```
items:
  date_to:
    type: date
    label: Date to
    validator:
      -
        plugin: mysql/validate_date
        method: validate_last_day_in_month
```

