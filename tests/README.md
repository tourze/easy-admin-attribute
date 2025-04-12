# EasyAdminBundle 属性扩展测试套件

此目录包含 `easy-admin-attribute` 包的完整测试套件。

## 测试结构

测试目录结构与源代码目录结构相对应：

- `Action/` - 测试操作相关属性 (Listable, Deletable, Creatable等)
- `Column/` - 测试列相关属性 (ListColumn, ExportColumn等)
- `Event/` - 测试事件处理属性 (AfterCreate, BeforeEdit等)
- `Field/` - 测试表单字段属性 (FormField, SelectField等)
- `Filter/` - 测试过滤相关属性 (Filterable, Keyword等)
- `Permission/` - 测试权限相关属性 (AsPermission)

此外，还有一个集成测试`IntegrationTest.php`，展示了如何组合使用这些属性。

## 运行测试

从包根目录运行：

```bash
composer test
```

或者：

```bash
vendor/bin/phpunit
```

## 测试覆盖范围

测试套件覆盖了以下内容：

1. **默认值验证** - 测试每个属性默认构造函数的默认值
2. **自定义值验证** - 测试创建带有自定义值的属性
3. **集成测试** - 测试属性如何在完整实体上一起工作
4. **环境变量集成** - 测试与系统环境变量的集成

## 添加新测试

添加新测试时，请遵循以下模式：

1. 创建对应属性的测试类 (e.g. `MyAttributeTest.php`)
2. 测试默认构造函数值
3. 测试带参数的构造函数
4. 测试任何特殊逻辑或边界条件

## 注意事项

* 所有测试应该不依赖于外部资源或状态
* 避免测试过程中创建临时文件或数据库连接
* 确保测试不相互依赖，每个测试应该能够独立运行
