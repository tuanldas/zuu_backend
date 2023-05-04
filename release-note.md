# Release Note

## 0.0.12

### Bug

* Khi chạy dự án ở local thì các container luôn được khởi động khi bật docker

### Nguyên nhân

* Các container được đặt cờ restart always theo mặc định

### Cách khắc phục

* Chỉ được restart always khi chạy trên production
