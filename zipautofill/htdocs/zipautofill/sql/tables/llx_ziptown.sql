-- ========================================================================
-- Copyright (C) 2010      Laurent Destailleur  <eldy@users.sourceforge.net>
--
-- This program is free software; you can redistribute it and/or modify
-- it under the terms of the GNU General Public License as published by
-- the Free Software Foundation; either version 2 of the License, or
-- (at your option) any later version.
--
-- This program is distributed in the hope that it will be useful,
-- but WITHOUT ANY WARRANTY; without even the implied warranty of
-- MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
-- GNU General Public License for more details.
--
-- You should have received a copy of the GNU General Public License
-- along with this program; if not, write to the Free Software
-- Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA.
--
-- $Id: llx_ziptown.sql,v 1.1 2010/08/09 15:00:55 eldy Exp $
--
-- Zip codes - Towns
-- ========================================================================


CREATE TABLE IF NOT EXISTS `llx_ziptown` (
  `zip` varchar(12) NOT NULL,
  `town` varchar(50) NOT NULL,
  `fk_departement` int(11) unsigned DEFAULT NULL,
  `fk_pays` int(11) unsigned DEFAULT NULL
) type=innodb;