-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2015 at 04:24 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `easysaledb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_counterno`
--

CREATE TABLE IF NOT EXISTS `tbl_counterno` (
  `SN` int(11) NOT NULL AUTO_INCREMENT,
  `CounterNo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`SN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `CustomerID` bigint(20) NOT NULL AUTO_INCREMENT,
  `CustomerName` varchar(100) DEFAULT NULL,
  `Address` longtext,
  `MobileNo` varchar(50) DEFAULT NULL,
  `DiscountCardID` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`CustomerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_discountcard`
--

CREATE TABLE IF NOT EXISTS `tbl_discountcard` (
  `CardID` varchar(50) NOT NULL,
  `CardActivationDate` datetime DEFAULT NULL,
  `CardExpiredDate` datetime DEFAULT NULL,
  `DiscountPC` double DEFAULT NULL,
  `DiscountAmount` double DEFAULT NULL,
  `CardStatus` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`CardID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employeeinfo`
--

CREATE TABLE IF NOT EXISTS `tbl_employeeinfo` (
  `employeeid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employeetype`
--

CREATE TABLE IF NOT EXISTS `tbl_employeetype` (
  `SN` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`SN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expense`
--

CREATE TABLE IF NOT EXISTS `tbl_expense` (
  `SN` bigint(20) NOT NULL AUTO_INCREMENT,
  `Date` datetime DEFAULT NULL,
  `HeadID` varchar(50) DEFAULT NULL,
  `Amount` double DEFAULT NULL,
  `Description` longtext,
  `GenerateBy` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`SN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_head`
--

CREATE TABLE IF NOT EXISTS `tbl_head` (
  `GLID` int(11) NOT NULL,
  `GLName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`GLID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lastmaxvalueofpid`
--

CREATE TABLE IF NOT EXISTS `tbl_lastmaxvalueofpid` (
  `LastIdValue` int(11) NOT NULL,
  `SN` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`SN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ledger`
--

CREATE TABLE IF NOT EXISTS `tbl_ledger` (
  `SN` bigint(20) NOT NULL AUTO_INCREMENT,
  `TransactionID` varchar(50) DEFAULT NULL,
  `TransactionDate` datetime DEFAULT NULL,
  `AccountNo` int(11) DEFAULT NULL,
  `AccountName` varchar(50) DEFAULT NULL,
  `Particular` longtext,
  `InAmount` double DEFAULT NULL,
  `OutAmount` double DEFAULT NULL,
  `VoucharNo` varchar(50) DEFAULT NULL,
  `Status` tinyint(3) unsigned DEFAULT NULL,
  `SubGLID` int(11) DEFAULT NULL,
  `ShopID` int(11) DEFAULT NULL,
  PRIMARY KEY (`SN`),
  KEY `RelationshipLedgerAndLedgerHeadByAccNo` (`AccountNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ledgerhead`
--

CREATE TABLE IF NOT EXISTS `tbl_ledgerhead` (
  `SN` bigint(20) NOT NULL,
  `GLID` int(11) DEFAULT NULL,
  `SubGLID` int(11) DEFAULT NULL,
  `AccountName` varchar(50) DEFAULT NULL,
  `AccountNo` int(11) NOT NULL,
  `Description` longtext,
  PRIMARY KEY (`AccountNo`),
  KEY `RelationshipLedgerHeadAndSubHeadBySubGLID` (`SubGLID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE IF NOT EXISTS `tbl_login` (
  `sn` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` int(11) DEFAULT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `auth_key` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `shopid` int(11) NOT NULL,
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`sn`, `user_type`, `user_id`, `password`, `auth_key`, `password_hash`, `shopid`) VALUES
(1, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loginhistory`
--

CREATE TABLE IF NOT EXISTS `tbl_loginhistory` (
  `SN` bigint(20) NOT NULL AUTO_INCREMENT,
  `StartTime` datetime DEFAULT NULL,
  `EmployeeID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`SN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lowstockwarning`
--

CREATE TABLE IF NOT EXISTS `tbl_lowstockwarning` (
  `SN` bigint(20) NOT NULL AUTO_INCREMENT,
  `Qty` int(11) DEFAULT NULL,
  PRIMARY KEY (`SN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `sn` int(11) NOT NULL AUTO_INCREMENT,
  `ProductID` varchar(50) NOT NULL,
  `ProductName` varchar(100) DEFAULT NULL,
  `CategoryID` bigint(20) DEFAULT NULL,
  `BarcodeNeeded` tinyint(3) unsigned DEFAULT '1',
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`sn`, `ProductID`, `ProductName`, `CategoryID`, `BarcodeNeeded`) VALUES
(9, '1424177377', 'asd', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productcategory`
--

CREATE TABLE IF NOT EXISTS `tbl_productcategory` (
  `CategoryID` bigint(20) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_productcategory`
--

INSERT INTO `tbl_productcategory` (`CategoryID`, `CategoryName`) VALUES
(3, 'ssffff'),
(4, 'aaa'),
(5, 'sss'),
(6, 'tt'),
(7, 'kkk');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productreturn`
--

CREATE TABLE IF NOT EXISTS `tbl_productreturn` (
  `SN` bigint(20) NOT NULL AUTO_INCREMENT,
  `Date` datetime DEFAULT NULL,
  `SupplierID` int(11) DEFAULT NULL,
  `ProductID` varchar(50) DEFAULT NULL,
  `ReturnQty` int(11) DEFAULT NULL,
  `ShopID` int(11) DEFAULT NULL,
  PRIMARY KEY (`SN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchaseinvinfo`
--

CREATE TABLE IF NOT EXISTS `tbl_purchaseinvinfo` (
  `InvoiceNo` varchar(100) NOT NULL,
  `SupplierID` int(11) DEFAULT NULL,
  `InvoiceDate` datetime DEFAULT NULL,
  `ReceivedDate` datetime DEFAULT NULL,
  `SubTotal` double DEFAULT NULL,
  `TotalVat` double DEFAULT NULL,
  `Discount` double DEFAULT NULL,
  `CarryingCost` double DEFAULT NULL,
  `InvTotal` double DEFAULT NULL,
  `InvTotalInRupee` double DEFAULT NULL,
  `CurrencyExRate` double DEFAULT NULL,
  `LC` double DEFAULT NULL,
  `ShopID` int(11) DEFAULT NULL,
  PRIMARY KEY (`InvoiceNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchaseproductinfo`
--

CREATE TABLE IF NOT EXISTS `tbl_purchaseproductinfo` (
  `SN` bigint(20) NOT NULL AUTO_INCREMENT,
  `SupplierID` int(11) DEFAULT NULL,
  `InvoiceNo` varchar(100) DEFAULT NULL,
  `ProductCategoryID` bigint(20) DEFAULT NULL,
  `ProductID` varchar(50) DEFAULT NULL,
  `UnitCost` double DEFAULT NULL,
  `UnitCostInRupee` double DEFAULT NULL,
  `Qty` int(11) DEFAULT NULL,
  `TotalAmount` double DEFAULT NULL,
  `SalesPrice` double DEFAULT NULL,
  `VatAmount` double DEFAULT NULL,
  `Discount` double DEFAULT NULL,
  `ShopID` int(11) DEFAULT NULL,
  `InvoiceNoHidden` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`SN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recentproductprice`
--

CREATE TABLE IF NOT EXISTS `tbl_recentproductprice` (
  `ProductID` varchar(50) NOT NULL,
  `UnitCost` double DEFAULT NULL,
  `SalePrice` double DEFAULT NULL,
  `InvoiceNo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ProductID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salesinvinfo`
--

CREATE TABLE IF NOT EXISTS `tbl_salesinvinfo` (
  `SN` bigint(20) NOT NULL,
  `SalesInvoiceNo` varchar(50) NOT NULL,
  `SalesDate` datetime DEFAULT NULL,
  `CounterNo` varchar(50) DEFAULT NULL,
  `CartTotal` double DEFAULT NULL,
  `Discount` double DEFAULT NULL,
  `Vat` double DEFAULT NULL,
  `GrandTotal` double DEFAULT NULL,
  `DueAmount` double DEFAULT NULL,
  `PaymentMode` varchar(50) DEFAULT NULL,
  `CustomerID` bigint(20) DEFAULT NULL,
  `CustomerMobileNo` varchar(50) DEFAULT NULL,
  `DiscountCardNo` varchar(50) DEFAULT NULL,
  `DiscountCardAmount` double DEFAULT NULL,
  `AdvanceStatus` tinyint(3) unsigned DEFAULT NULL,
  `Profit` double DEFAULT NULL,
  `SalesBy` varchar(50) DEFAULT NULL,
  `ShopID` int(11) DEFAULT NULL,
  `DiscountGivenBy` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`SalesInvoiceNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salesmancommission`
--

CREATE TABLE IF NOT EXISTS `tbl_salesmancommission` (
  `SN` bigint(20) NOT NULL AUTO_INCREMENT,
  `EmployeeID` bigint(20) DEFAULT NULL,
  `InvoiceNo` varchar(50) DEFAULT NULL,
  `SalesDate` datetime DEFAULT NULL,
  `Amount` double DEFAULT NULL,
  PRIMARY KEY (`SN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salesproductinfo`
--

CREATE TABLE IF NOT EXISTS `tbl_salesproductinfo` (
  `SN` bigint(20) NOT NULL AUTO_INCREMENT,
  `SalesInvoiceNo` varchar(50) DEFAULT NULL,
  `ProductID` varchar(50) DEFAULT NULL,
  `ProductCategoryID` bigint(20) DEFAULT NULL,
  `SalesPrice` double DEFAULT NULL,
  `Qty` int(11) DEFAULT NULL,
  `TotalAmount` double DEFAULT NULL,
  `VatAmount` double DEFAULT NULL,
  `Discount` double DEFAULT NULL,
  `SalesDate` datetime DEFAULT NULL,
  `PurchaseInvNo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`SN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_session`
--

CREATE TABLE IF NOT EXISTS `tbl_session` (
  `id` char(32) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` longblob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_session`
--

INSERT INTO `tbl_session` (`id`, `expire`, `data`) VALUES
('vdj36qm479tphgo8hoji01tdf3', 1424706499, 0x5f5f666c6173687c613a303a7b7d706b7c693a313b5f5f69647c693a313b);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setcommission`
--

CREATE TABLE IF NOT EXISTS `tbl_setcommission` (
  `SN` int(11) NOT NULL AUTO_INCREMENT,
  `Amount` double DEFAULT NULL,
  PRIMARY KEY (`SN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shop`
--

CREATE TABLE IF NOT EXISTS `tbl_shop` (
  `shopid` int(11) NOT NULL AUTO_INCREMENT,
  `ShopName` varchar(100) DEFAULT NULL,
  `Address1` longtext,
  `Address2` longtext,
  `ContactNo` varchar(50) DEFAULT NULL,
  `owner_name` varchar(100) DEFAULT NULL,
  `Logo` tinyblob,
  `Slogan` longtext,
  `owner_id` int(11) NOT NULL,
  `shop_type` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`shopid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `tbl_shop`
--

INSERT INTO `tbl_shop` (`shopid`, `ShopName`, `Address1`, `Address2`, `ContactNo`, `owner_name`, `Logo`, `Slogan`, `owner_id`, `shop_type`, `status`) VALUES
(13, 'Swapno Shopping ', 'bsd', '', '01737014055', 'Joyprokash', 0x64617364, 'asdasd', 0, '', 0),
(15, 'Swapno', 'dfg', '', '34234', 'dfsd', '', 'sdffds', 0, '', 0),
(16, 'Mina Bazar', 'dfgd', '', '234234', 'dfsdf', '', 'sdfs', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shopowner`
--

CREATE TABLE IF NOT EXISTS `tbl_shopowner` (
  `owner_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`owner_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_shopowner`
--

INSERT INTO `tbl_shopowner` (`owner_id`, `name`, `address`, `phone`, `business_name`, `created_at`, `updated_at`, `status`) VALUES
(5, 'rashi', 'sakjdfh', '898', 'arrowsoft', '2015-02-21 00:00:00', NULL, 1),
(7, 'ArrowSoft', 'lklkjl', '98', 'nhkjh', '2015-02-21 00:00:00', '2015-02-23 00:00:00', 0),
(8, 'ppppp', 'dddd', '4444', 'ddddd', '2015-02-23 00:00:00', '2015-02-23 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shopuser`
--

CREATE TABLE IF NOT EXISTS `tbl_shopuser` (
  `sn` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `auth_key` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) NOT NULL,
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `tbl_shopuser`
--

INSERT INTO `tbl_shopuser` (`sn`, `shop_id`, `username`, `password`, `type`, `auth_key`, `password_hash`, `emp_id`, `created_at`, `updated_at`, `status`) VALUES
(43, '{60BE15E5-5F90-23E2-BD14-B8DDC7912A1B}', 'admin', '21232f297a57a5a743894a0e4a801fc3', 3, '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(45, '', 'sd', 'a0aa6f36bc82a0d364dfd855b3920036', 4, '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(52, '{60BE15E5-5F90-23E2-BD14-B8DDC7912A1B}', 'ss', '93b8004c63cb098c7c7cf5ca98d9898b', 4, '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(53, '{60BE15E5-5F90-23E2-BD14-B8DDC7912A1B}', 'sdfww', '74be16979710d4c4e7c6647856088456', 3, '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(54, '{549FAF9F-CFB4-4B0C-363B-C5EB217360F8}', 'dfg', '38d7355701b6f3760ee49852904319c1', 2, '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(55, '{99DF44E0-6494-D537-A94F-D5B0D86C3DB9}', 'dfg', '38d7355701b6f3760ee49852904319c1', 2, '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(56, '25', 'asd', 'asd', 0, '', '', 1, '2015-02-22 18:00:00', '0000-00-00 00:00:00', 0),
(57, '26', 'asd', 'asd', 0, '', '', 1, '2015-02-22 18:00:00', '0000-00-00 00:00:00', 1),
(58, '27', 'qwe', 'qwe', 0, '', '', 1, '2015-02-22 18:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stockdetail`
--

CREATE TABLE IF NOT EXISTS `tbl_stockdetail` (
  `SN` bigint(20) NOT NULL AUTO_INCREMENT,
  `ProductID` varchar(50) DEFAULT NULL,
  `CreateDate` datetime DEFAULT NULL,
  `AddQty` int(11) DEFAULT NULL,
  `AddCost` double DEFAULT NULL,
  `SubQty` int(11) DEFAULT NULL,
  `SubCost` double DEFAULT NULL,
  `PurchaseInvoiceNo` varchar(50) DEFAULT NULL,
  `SalesInvoiceNo` varchar(50) DEFAULT NULL,
  `BookingID` varchar(50) DEFAULT NULL,
  `SupplierID` int(11) DEFAULT NULL,
  `ShopID` int(11) DEFAULT NULL,
  PRIMARY KEY (`SN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stocksummary`
--

CREATE TABLE IF NOT EXISTS `tbl_stocksummary` (
  `SN` bigint(20) NOT NULL AUTO_INCREMENT,
  `CategoryID` int(11) DEFAULT NULL,
  `ProductID` varchar(50) DEFAULT NULL,
  `StockQty` int(11) DEFAULT NULL,
  `SupplierID` int(11) DEFAULT NULL,
  `ShopID` int(11) DEFAULT NULL,
  PRIMARY KEY (`SN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subhead`
--

CREATE TABLE IF NOT EXISTS `tbl_subhead` (
  `SubGLID` int(11) NOT NULL AUTO_INCREMENT,
  `GLID` int(11) DEFAULT NULL,
  `SubHeadName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`SubGLID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE IF NOT EXISTS `tbl_supplier` (
  `SupplierID` int(11) NOT NULL AUTO_INCREMENT,
  `SupplierName` varchar(100) DEFAULT NULL,
  `Address` longtext,
  `ContactNo` varchar(50) DEFAULT NULL,
  `ContactPerson` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`SupplierID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`SupplierID`, `SupplierName`, `Address`, `ContactNo`, `ContactPerson`) VALUES
(1, 'sdas', 'asdasd', '3423423', 'asdasd'),
(2, 'Joy', 'adas', '01737014055', 'asdasd'),
(4, 'adad', 'asdas', '23423', 'wewer'),
(9, 'asdas', 'asdas', '234', 'wewerw');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tempexpensereport`
--

CREATE TABLE IF NOT EXISTS `tbl_tempexpensereport` (
  `SN` int(11) NOT NULL,
  `AccountName` varchar(50) DEFAULT NULL,
  `AccountNo` int(11) DEFAULT NULL,
  `Amount` double DEFAULT NULL,
  PRIMARY KEY (`SN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tempmostsellingproduct`
--

CREATE TABLE IF NOT EXISTS `tbl_tempmostsellingproduct` (
  `SN` int(11) NOT NULL,
  `ProductCategory` varchar(50) DEFAULT NULL,
  `ProductName` varchar(100) DEFAULT NULL,
  `ProductID` varchar(50) DEFAULT NULL,
  `TotalSaleQty` int(11) DEFAULT NULL,
  PRIMARY KEY (`SN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tempsalesmancommissionreport`
--

CREATE TABLE IF NOT EXISTS `tbl_tempsalesmancommissionreport` (
  `SN` bigint(20) NOT NULL AUTO_INCREMENT,
  `SalesManName` varchar(50) DEFAULT NULL,
  `Amount` double DEFAULT NULL,
  PRIMARY KEY (`SN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tempstockreport`
--

CREATE TABLE IF NOT EXISTS `tbl_tempstockreport` (
  `SN` bigint(20) NOT NULL AUTO_INCREMENT,
  `ProductGroup` varchar(50) DEFAULT NULL,
  `ProductID` varchar(50) DEFAULT NULL,
  `ProductName` varchar(50) DEFAULT NULL,
  `UnitPrice` double DEFAULT NULL,
  `SalesPrice` double DEFAULT NULL,
  `PurchaseQty` int(11) DEFAULT NULL,
  `SaleQty` int(11) DEFAULT NULL,
  `AdvanceQty` int(11) DEFAULT NULL,
  `AvailableQty` int(11) DEFAULT NULL,
  `TotalPurchasePrice` double DEFAULT NULL,
  `TotalSalePrice` double DEFAULT NULL,
  `TotalAvailablePrice` double DEFAULT NULL,
  PRIMARY KEY (`SN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_ledger`
--
ALTER TABLE `tbl_ledger`
  ADD CONSTRAINT `RelationshipLedgerAndLedgerHeadByAccNo` FOREIGN KEY (`AccountNo`) REFERENCES `tbl_ledgerhead` (`AccountNo`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_ledgerhead`
--
ALTER TABLE `tbl_ledgerhead`
  ADD CONSTRAINT `RelationshipLedgerHeadAndSubHeadBySubGLID` FOREIGN KEY (`SubGLID`) REFERENCES `tbl_subhead` (`SubGLID`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
