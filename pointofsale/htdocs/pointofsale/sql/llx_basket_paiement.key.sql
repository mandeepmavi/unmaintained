-- ============================================================================
-- Copyright (C) 2010 Denis Martin <denimartin@hotmail.fr>
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
-- $Id: llx_basket_paiement.key.sql,v 1.1 2010/11/20 13:50:43 denismartin Exp $
-- ============================================================================

ALTER TABLE llx_basket_paiement ADD CONSTRAINT fk_basket_paiement_paiement FOREIGN KEY (fk_paiement) REFERENCES llx_paiement (rowid) ;

ALTER TABLE llx_basket_paiement ADD CONSTRAINT fk_basket_paiement_bank FOREIGN KEY (fk_bank) REFERENCES llx_bank (rowid) ;

ALTER TABLE llx_basket_paiement ADD CONSTRAINT fk_basket_paiement_basket FOREIGN KEY (fk_basket) REFERENCES llx_basket (rowid) ;