# Buto-Plugin-MysqlValidate_date

Form validator.


##Validate two date fields.


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

