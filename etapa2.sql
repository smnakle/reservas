SELECT d.dept_name, concat(e.first_name ,' ', e.last_name) AS name, datediff(now(), de.from_date) as dias_trabalhados
FROM dept_emp AS de
LEFT JOIN departments AS d ON de.dept_no = d.dept_no
LEFT JOIN employees AS e ON de.emp_no = e.emp_no
WHERE de.dept_no like 'd001' AND de.to_date IS null order by de.from_date ASC limit 10;